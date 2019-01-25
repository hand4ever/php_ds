package main

import "fmt"

//TElemType is alias of type
type TElemType = byte

//BiTNode 二叉树节点类型
type BiTNode struct {
	data   TElemType
	lchild *BiTNode
	rchild *BiTNode
}

//BiTree BiTNode的指针类型
type BiTree = *BiTNode

/**
 * CreateBiTree
 * 前序输入二叉树
 * @params T *BiTree
 */
func CreateBiTree(T BiTree, seq []byte) {
	// var ch TElemType
	// fmt.Scanf("%c", &ch)
	for _, ch := range seq {
		if ch == '#' {
			T = nil
			// fmt.Println(string(ch))
		} else {

		}
	}
	// if ch == '#' {
	// 	T = nil
	// } else {
	// 	T = new(BiTNode)
	// 	if T == nil {
	// 		os.Exit(0)
	// 	}
	// 	T.data = ch
	// 	CreateBiTree(T.lchild)
	// 	CreateBiTree(T.rchild)
	// }
	// fmt.Println(T)

}
func main() {
	// var str string = "ABDH#K###E##CFI###G#J##"
	bstr := []byte("ABDH#K###E##CFI###G#J##")
	// fmt.Println(bstr)
	// for _, ch := range bstr {
	// 	fmt.Println(ch, string(ch))
	// }
	var T BiTree
	CreateBiTree(T, bstr)
	fmt.Println(T)
}
