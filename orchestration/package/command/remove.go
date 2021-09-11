package command

import "os/exec"

func remove() {
    execute(exec.Command("docker-compose", "down", "-v", "--rmi", "all"))
}
