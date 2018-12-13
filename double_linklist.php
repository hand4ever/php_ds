<?php
/**
 * 双向节点
 * @linkto https://www.cnblogs.com/newwy/archive/2010/10/10/1847458.html
 * Class DulNode
 */
class DulNode {
    /**
     * ElemType
     *
     * @var int
     */
    public $data;
    /**
     * 前驱节点
     * @var DulNode
     */
    public $prior;
    /**
     * 后继节点
     * @var DulNode
     */
    public $next;
}

/**
 * 初始化操作，建立一个空的线性表 L
 * @param $L Node
 * @param $arr array 默认的初始化值
 */
function InitList(&$L, $arr=null)
{
    $head = new stdClass;
    $head->next = null;
    $L = $head;

    $q = $L;
    if($arr) {
        foreach($arr as $v) {
            $node = new DulNode;
            $node->data = $v;

            //头插法
            /*
            $node->next  = $q->next;
            unset($q->next);
            $node->prior = $q;
            $q->next     = $node;
            */

            //尾插法
            $node->next = null;
            $node->prior = $q;
            $q->next = $node;
            $q = $node;
        }
    }

}

/**
 * 若线性表为空，返回 true，否则返回 false
 * @param $L Node
 * @return bool
 */
function ListEmpty($L)
{
    if ($L->next==null) return true;

    return false;
}

/**
 *
 * 将线性表清空
 * @param $L
 */
function ClearList(&$L)
{
    //in php $L = null; //done!
    $p = $L->next;
    $q = null;
    while($p) {
        $q = &$p->next;
//        $p = null;
        $p->data = null;
        $p = $q;
    }
}

/**
 * 将线性表 L 中第 i 个元素返回给 e
 * @param $L
 * @param $i
 * @param $e
 * @return int
 */
function GetElem($L, $i, &$e)
{
    $p = $L->next;
    $j = 0;
    while($p && $j < $i) {
        $p = &$p->next;
        $j++;
    }
    if(!$p || $j > $i) {
        return -1;// i 位置不存在
    }

    $e = $p->data;

    return 0;
}

/**
 * 在线性表 L 中查找与 e 相等的元素，如果查找成功，则返回元素所在位置以示成功，否则返回 0 表示失败
 * @param $L
 * @param $e
 * @return int
 */
function LocateElem($L, $e)
{
    $p = $L->next;

    $i = 0;
    while($p) {
        if($p->data == $e) {
            return $i;
        }
        ++$i;
        $p = &$p->next;
    }

    return -1;
}

/**
 * 在线性表 L 的第 i 个位置插入元素 e
 * @param $L
 * @param $i
 * @param $e
 * @return int 0: success 1: fail
 */
function ListInsert(&$L, $i, $e)
{
    $p = $L;
    $j = 0;
    while($p && $j < $i) {
        $p = $p->next;
        $j++;
    }
    if(!$p || $j > $i) {
//        exit("not exist position {$i}");
        return -1;//不存在第 i 个位置
    }
    $node = new DulNode;
    $node->data = $e;

    $node->next = $p->next;
    $node->prior = $p;
    $p->next = $node;



    return 0;
}

/**
 * 删除线性表 L 中的第 i 个位置的元素，并用 e 返回其值
 * @param $L
 * @param $i
 * @param $e
 * @return int
 */
function ListDelete(&$L, $i, &$e)
{
    $p = $L->next;
    $j = 0;
    while($p && $j < $i) {
        $q = $p;
        $p = &$p->next;
        ++$j;
    }
    if (!$p && $j > $i) {
        return -1;// i not exists
    } else if ($p->next == null) {//删除最后一个节点
        $e = $p->data;
        $p->prior->next = null;
    } else {
        $e = $p->data;
        $q->next = $p->next;
        $p->next->prior = $q;
    }




    return 0;
}

/**
 * 返回线性表 L 的元素个数
 * @param $L
 * @return int
 */
function ListLength($L)
{
    if (ListEmpty($L)) {
        return 0;
    }
    $i = 0;
    $p = $L->next;
    while($p) {
        $i++;
        $p = &$p->next;
    }
    return $i;
}
/**
 * 遍历线性表 L 中的每个元素
 * @param $L
 * @return string
 */
function ListTraverse($L)
{
    if (ListEmpty($L)) return "NULL\n";
    $p = $L->next;
    while($p) {
        echo $p->data,PHP_EOL;
        $p = &$p->next;
    }
    return 0;
}

/**
 * 将所有在 La 中但不在 Lb 中的数据插入到 La 结尾
 * @param $La
 * @param $Lb
 */
function union(&$La, $Lb)
{
    $La_len = ListLength($La);
    $Lb_len = ListLength($Lb);
    for($i=0; $i<$Lb_len; $i++) {
        $e = null;
        GetElem($Lb, $i, $e);
        if(LocateElem($La, $e) == -1) {
            ListInsert($La, ++$La_len-1, $e);
        }
    }
}

$L = null;
InitList($L, [1,2,3,4,5]);

ListInsert($L, 3, 30);
ListTraverse($L);
ListDelete($L, 2, $de);
echo "deleteNode: ", $de, PHP_EOL;
ListTraverse($L);
echo "Length:", ListLength($L),PHP_EOL;
$e = 0;
GetElem($L, 3, $e);
echo "GetElem:", $e,PHP_EOL;
echo "LocateElem:", LocateElem($L, 3),PHP_EOL;
