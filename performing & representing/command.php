<?php 

interface Command{
    public function execute();
}

class CopyCommand implements Command{
    public function execute(){
        echo "COPY COMMAND \n";
    }
}

class EditCommand implements Command{
    public function execute()
    {
        echo "EDIT COMMAND \n";
    }
}

class Invoker{
    public array $history = [];

    public function invoke(Command $command){
        $this->history[] = $command;
        $command->execute();
    }

    public function undo(Command $command){
        $key = array_search($command,$this->history,true);
        if(isset($key)){
            array_splice($this->history,$key,1,[]);
        }
        $command->execute();
    }
}

class Client{
  public function execute(){
    $copyCommand = new CopyCommand();
    $editCommand = new EditCommand();
    $newCommand = new CopyCommand();
    $invoker = new Invoker();
    $invoker->invoke($copyCommand);
    $invoker->invoke($editCommand);
    $invoker->invoke($newCommand);
  }
}

?>