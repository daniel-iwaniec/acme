package command

import (
    "fmt"
    "os/exec"
)

func up() {
    var commands [2]*exec.Cmd
    commands[0] = exec.Command("docker-compose", "up", "-d")
    commands[1] = exec.Command("docker-compose", "exec", "-T", "-w", "/application", "acme", "composer", "install")
    for i := 0; i < len(commands); i++ {
        execute(commands[i])
    }

    fmt.Println()
    fmt.Println()
    fmt.Println("Running shop tests ⚙")
    fmt.Println()
    execute(
        exec.Command(
            "docker-compose",
            "exec",
            "-T",
            "-w",
            "/application",
            "acme",
            "vendor/bin/phpunit",
        ),
    )

    fmt.Println()
    fmt.Println()
    fmt.Println("Running shop analysis ⚙")
    fmt.Println()
    execute(
        exec.Command(
            "docker-compose",
            "exec",
            "-T",
            "-w",
            "/application",
            "acme",
            "vendor/bin/phpstan",
            "analyse",
            "source",
            "test",
            "--level=max",
        ),
    )
}
