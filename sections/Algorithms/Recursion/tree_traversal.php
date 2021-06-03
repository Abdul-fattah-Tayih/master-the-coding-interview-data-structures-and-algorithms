<?php

class Tree
{
    public $root;

    public function __construct(TreeNode $root)
    {
        $this->root = $root;
    }
}

class TreeNode
{
    public $data;
    public $right = null;
    public $left = null;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

$nodes = new TreeNode(15);
$nodes->left = new TreeNode(13);
$nodes->left->left = new TreeNode(11);
$nodes->left->right = new TreeNode(12);
$nodes->right = new TreeNode(17);
$nodes->right->right = new TreeNode(19);
$nodes->right->left = new TreeNode(18);

$tree = new Tree($nodes);
echo 'recursive' . PHP_EOL;
traverse($tree->root);
echo 'iterative' . PHP_EOL;
traverseIterative($tree->root);

function traverse($node)
{
    if ($node === null) {
        return;
    }

    echo $node->data . PHP_EOL;

    traverse($node->left);
    traverse($node->right);
}

function traverseIterative($node)
{
    if ($node === null) {
        return;
    }

    $stack = new SplStack;
    $stack->push($node);

    while(!$stack->isEmpty()) {
        $node = $stack->pop();
        echo $node->data . PHP_EOL;
        // push right first so we can process left first, because stacks are LIFO
        if ($node->right !== null) {
            $stack->push($node->right);
        }

        if ($node->left !== null) {
            $stack->push($node->left);
        }
    }
}