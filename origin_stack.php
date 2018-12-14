<?php
/**
 * Created by PhpStorm.
 * User: panlong
 * Date: 2018/12/13
 * Time: 16:34
 */

/**
 * 栈节点
 * Class StackNode
 */
class StackNode
{
    /**
     * @var int
     */
    public $data;
    /**
     * @var StackNode
     */
    public $next;
}

/**
 * 栈链表
 * Class LinkStack
 */
class LinkStack
{
    /**
     * @var StackNode &
     */
    public $top;
    /**
     * @var int
     */
    public $count;

}

/**
 * 构造一个空栈S
 * @param $S LinkStack
 */
function InitStack(LinkStack &$S)
{
    $S->top = null;
    $S->count = 0;
}

function ClearStack(LinkStack &$S)
{
    $top = $S->top;
    while($top) {
        $top = $top->next;
        $S->count--;
    }
}
function StackEmpty(LinkStack $S)
{
    return $S->count == 0;
}
function getTop(LinkStack $S)
{
    return $S->top->data;
}

/**
 * 入元素e为新的栈顶元素
 * @param $S LinkStack
 * @param $e int
 */
function push(LinkStack &$S, /*int*/ $e)
{
    $node = new StackNode;
    $node->data = $e;

    $node->next = &$S->top;
    $S->top = &$node;
    $S->count++;
}

/**
 * 若栈不空，则删除S的栈顶元素，用e返回其值，并返回OK；否则返回ERROR
 * @param LinkStack $S
 * @param $e
 */
function pop(LinkStack &$S, &$e)
{
    if($S->top) {
        $e = $S->top->data;

        $S->top = &$S->top->next;
        $S->count--;
    }
}
function StackLength(LinkStack $S)
{
    return $S->count;
}

/**
 * 遍历栈
 * @param LinkStack $S
 * @param $visit callable
 */
function StackTraverse(LinkStack $S, callable $visit)
{
    $p = $S->top;
    while($p) {
        $visit($p->data);
        $p = &$p->next;
    }
}
//逆波兰表示法
function rpn(LinkStack $S, callable $visit)
{
    $Stemp = new LinkStack;
    InitStack($Stemp);
    while(!StackEmpty($S)) {
        $e = null;
        $q = null;
        pop($S, $e);
        if(is_numeric($e)) {//规则：数字，直接输出
            $visit($e);
            continue;
        }
        switch($e) {
            case '('://规则：左括号，直接入栈 Stemp
                push($Stemp, $e);
                break;
            case ')'://规则：右括号，则匹配 栈Stemp 的左括号
                while($q!='(') {
                    pop($Stemp, $q);
                    $visit($q);
                }
                break;
            default://规则：符号 小于 Stemp栈顶符号，Stemp 出栈，直到遇到优先级大的，$e 入栈 Stemp
                $p = null;
                while(!StackEmpty($Stemp) && compare($e, getTop($Stemp))) {
                    pop($Stemp, $p);
                    $visit($p);
                }
                push($Stemp, $e);
        }
    }
    while(!StackEmpty($Stemp)) {
        $m = null;
        pop($Stemp, $m);
        $visit($m);
    }

}

/**
 * 比较四则运算表达式
 * @param $cur
 * @param $top
 * @return bool
 */
function compare($cur, $top)
{
    $priority = [
        '+' => 1,
        '-' => 1,
        '*' => 2,
        '/' => 2,
        '(' => -1,
    ];
    return $priority[$cur] <= $priority[$top];
}

function visitDisplayBR($str)
{
    echo $str, PHP_EOL;
}
function visitDisplayRaw($str)
{
    echo $str;
}
$S = new LinkStack;
InitStack($S);

push($S, 11);
push($S, 22);
push($S, 33);
$e = null;
pop($S, $e);
StackTraverse($S, 'visitDisplayBR');
echo "pop ElemType:", $e, PHP_EOL;

//中缀表达式 转换为 逆波兰表达式（后缀表达式）
$Sa = new LinkStack;//中缀栈
$Stemp = new LinkStack;//辅助栈
InitStack($Sa);
$str = '9+(3-1)*3+8/2';
$strArr = str_split($str);
foreach(array_reverse($strArr) as $v) {
    push($Sa, $v);
}
StackTraverse($Sa, 'visitDisplayRaw');
echo PHP_EOL,"RPN", PHP_EOL;
rpn($Sa, function($str){
    echo $str, ' ';
});


