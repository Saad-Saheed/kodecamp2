<?php

class ListNode
{

    public $data = null;
    public $next = null;
    public $previous = null;
    public $nodeIndex;

    public function __construct(string $data = null)
    {
        $this->data = $data;
    }
}

class LinkedList
{
    private $firstNode = null;
    private $totalNode = 0;

    public function insert(string $data = null)
    {
        $newNode = new ListNode($data);

        //if this is the first item
        if ($this->firstNode == null) {
            $this->firstNode = &$newNode;
        } else {
            $currentNode = $this->firstNode;

            //if this is totalNode is One, then set previuosNode to firstNode else set it to null 
            $previousNode = ($this->totalNode === 1) ? $this->firstNode : null;

            while ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
            }

            if ($previousNode === null) {
                $previousNode = $currentNode->previous;
            }
            $newNode->previous = $previousNode;

            $currentNode->next = $newNode;


            // check if previous node exists
            // while($currentNode->previous !== null){
            //     $previousNode = $currentNode->previous;
            // }
            // $currentNode->previous = 23;

        }

        $newNode->nodeIndex = $this->totalNode;
        $this->totalNode++;

        return true;
    }

    public function display()
    {
        print_r("total Item is {$this->totalNode}<br>");
        $currentNode = $this->firstNode;

        while ($currentNode !== null) {
            echo "<pre>";
            print_r($currentNode->data);
            echo "</pre>";
            $currentNode = $currentNode->next;
        }
    }

    public function searchWithIndex(int $index)
    {
        $initCount = 0;
        $currentNode = $this->firstNode;
        if ($this->firstNode !== null && $index < $this->totalNode) {
            while ($currentNode !== null) {
                if ($initCount === $index) {
                    return $currentNode;
                }
                $initCount++;
                $currentNode = $currentNode->next;
            }
        }
        return "Item Not Found";
    }
}

$ls = new LinkedList();

$ls->insert('hello');
$ls->insert('Hi Boy');
$ls->insert('how are you doing');
$ls->insert('fine and you?');
$ls->insert('Alhamdulillah the same');

echo "<pre>";
print_r($ls->searchWithIndex(9));
echo "</pre>";

// $ls->display();