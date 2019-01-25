package main

import "fmt"

func main() {
	bstr := []byte("Hello")

	for _, ch := range bstr {
		fmt.Println(string(ch))
	}
}
