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

/**
 * hello
 *
 * @param array ...$arrays
 * @return array
 */
function arraysSum(array ...$arrays): array
{
    return array_map(function(array $array): int {
        return array_sum($array);
    }, $arrays);
}

print_r(arraysSum([1,2,"3"], [4,5,6], [7,8,9]));
/**
 * helo
 *
 * @param array $arr
 * @return array
 */
function bubble($arr)
{
    $len = count($arr);
    for($i=$len-1, $change=true; $i>=1 && $change; --$i) {
        $change = false;
        for($j=0; $j<$i; ++$j) {
            if($arr[$j] > $arr[$j+1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $tmp;
                $change =true;
            }
        }
    }
    return $arr;
}

$ar = bubble([1,2,3,4,5]);

print_r($ar);
