package command

import (
    "fmt"
    "os"
    "os/exec"
    "reflect"
)

var commands = map[string]interface{}{
    "up": up,
    "remove": remove,
}

func CallByArgument(arguments []string) {
    if len(arguments) < 2 {
        fmt.Println("Argument is required")
        os.Exit(1)
    }

    if commands[arguments[1]] == nil {
        fmt.Println("Argument is required")
        os.Exit(1)
    }

    reflect.ValueOf(commands[arguments[1]]).Call(make([]reflect.Value, 0))
}

func execute(command *exec.Cmd) {
    command.Stdout = os.Stdout
    command.Stderr = os.Stderr

    if command.Run() != nil {
        os.Exit(1)
    }
}
