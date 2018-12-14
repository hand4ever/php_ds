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
function DestoryStack(LinkStack &$S)
{}
function ClearStack(LinkStack &$S)
{}
function StackEmpty(LinkStack $S)
{}
function getTop(LinkStack $S)
{}

/**
 * 入元素e为新的栈顶元素
 * @param $S LinkStack
 * @param $e int
 */
function push(LinkStack &$S, int $e)
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
function StackLength($S)
{}

/**
 * 遍历栈
 * @param LinkStack $S
 */
function StackTraverse(LinkStack $S)
{
    $p = $S->top;
    while($p) {
        echo $p->data,PHP_EOL;
        $p = &$p->next;
    }
}
$S = new LinkStack;
InitStack($S);
push($S, 11);
push($S, 22);
push($S, 33);

$e = null;
pop($S, $e);
StackTraverse($S);
echo "pop ElemType:", $e, PHP_EOL;