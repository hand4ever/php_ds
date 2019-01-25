<?php
//树的双亲表示法
const MAX_TREE_SIZE = 100;
/**
 * 树节点结构
 * @author panlong
 *
 */
class PTNode
{
    /**
     * 数据域
     * @var int
     */
    public $data;
    
    /**
     * 双亲位置
     * @var int
     */
    public $parent;
}

class PTree
{
    /**
     * 节点数组
     * @var array[PTNode]
     */
    public $nodes;
    /**
     * 根的位置
     * @var int
     */
    public $r;
    /**
     * 结点数
     * @var int
     */
    public $n;
}

class Ta 
{
    public $aaa = 333;
    public function test(Ta $t)
    {
        print_r($t->aaa);
    }
}

$t = new Ta;
$t->aaa = 444;

(new Ta)->test($t);