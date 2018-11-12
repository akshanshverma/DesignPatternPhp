<?php
interface CommandExecutor{
    public function runCommand($cmd);
}

class CommandExecutorImpl implements CommandExecutor{

    public function runCommand($cmd)
    {
        echo $cmd." <<-- command executed.\n";
    }
}

class CommandExecutorProxy implements CommandExecutor{
    private $isAdmin = false;
    private $executor;

    public function CommandExecutorProxy($user,$pwd)    
    {
        if ("akku" == $user && "1234" == $pwd) {
            $this->isAdmin = true;
            $this->executor = new CommandExecutorImpl();
        }
    }

    public function runCommand($cmd)
    {
        if($this->isAdmin){
            $this->executor->runCommand($cmd);
        }else {
            echo "user id and password is invalid\n";
        }
    }
}

function main()
{
    $obj = new CommandExecutorProxy("akku","1234");
    $obj->runCommand("asbajhsba");
}
main();
?>