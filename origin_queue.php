<?php
/**
 * Created by PhpStorm.
 * User: panlong
 * Date: 2018/12/17
 * Time: 17:24
 */

/**
 * 循环队列
 * Class SqQueue
 */
class SqQueue
{
    /**
     * 最大长度
     */
    public $MAXSIZE=5;
    /**
     * <= MAXSIZE
     * @var array of int
     */
    public $data;
    /**
     * 头指针
     * @var int
     */
    public $front;
    /**
     * 尾指针，若队列不空，则指向队尾元素的下一个位置
     * @var int
     */
    public $rear;
}

/**
 * 队列初始化
 * @param $Q
 */
function InitQueue(SqQueue &$Q)
{
    $Q->front = 0;
    $Q->rear = 0;
}

/**
 * 队列长度
 * @param $Q
 * @return int
 */
function QueueLength(SqQueue $Q)
{
    //(rear-front+QueueSize)%QueueSize
    return ($Q->rear-$Q->front+$Q->MAXSIZE) % $Q->MAXSIZE;
}

/**
 * 元素入队列
 * @param SqQueue $Q
 * @param $e
 * @return bool
 */
function EnQueue(SqQueue &$Q, $e)
{
    //(rear+1)%QueueSize==front
    if (($Q->rear+1)%$Q->MAXSIZE == $Q->front) {//队列已满
        echo "队列已满\n";
        return false;
    }
    $Q->data[$Q->rear] = $e;
    $Q->rear = ($Q->rear+1)%$Q->MAXSIZE; //<----
    return true;
}

/**
 * 元素出队列
 * @param SqQueue $Q
 * @param $e
 * @return bool
 */
function DeQueue(SqQueue &$Q, &$e)
{
    if ($Q->front == $Q->rear)//队空
        return false;
    $e = $Q->data[$Q->front];
    $Q->front = ($Q->front+1)%$Q->MAXSIZE; //<----
    return true;
}

/**
 * 遍历队列
 * @param $Q
 * @param callable $visit
 */
function QueueTraverse(SqQueue $Q, callable $visit)
{
    $i = $Q->front;
    while($i!=$Q->rear) {
        $visit($Q->data[$i]);
        $i = ($i+1)%$Q->MAXSIZE;
    }
}
$Q = new SqQueue;
InitQueue($Q);
EnQueue($Q, 11);
EnQueue($Q, 22);
EnQueue($Q, 33);
EnQueue($Q, 44);
EnQueue($Q, 123);
$e = 0;
DeQueue($Q, $e);
EnQueue($Q, 55);
DeQueue($Q, $e);
EnQueue($Q, 66);
//EnQueue($Q, 66);
//echo '$e=', $e, PHP_EOL;
QueueTraverse($Q, function ($o){echo $o, " ";});
