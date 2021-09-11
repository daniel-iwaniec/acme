package main

import (
    "fmt"
    "os"
)
import "acme/package/command"

func main() {
    pwd, err := os.Getwd()
    if err != nil {
        fmt.Println(err)
        os.Exit(1)
    }

    err = os.Chdir(pwd + "/infrastructure")
    if err != nil {
        fmt.Println(err)
        os.Exit(1)
    }

    command.CallByArgument(os.Args)
}
