<?php
/**
 * Created by PhpStorm.
 * User: haitian
 * Date: 16/4/26
 * Time: 09:58
 */
include "BinarySearchTree.php";

$node = new \BinarySearchTree\Node(1);
$anotherNode = new \BinarySearchTree\Node(2);

//test compare
if ($node->compare($anotherNode) !== -1
    || $anotherNode->compare($node) !== 1
    || $node->compare($node) !== 0
) {
    throw new Exception("error in node comparing");
}
$tree = new \BinarySearchTree\BinarySearchTree($node);

$tree->insert(4)->insert(2)->insert(5)->insert(3)->insert(6);

if ($tree->getSize() !== 6) {
    throw new Exception("tree size error");
}

$five = $tree->search(5);
if ($five->getValue() !== 5
    || $five->parent->getValue() !== 4
    || $five->right->getValue() !== 6
    || !is_null($five->left)
) {
    throw new Exception("tree search error");
}

$tree->delete(5);
if ($tree->getSize() !== 5) {
    throw new Exception("tree delete error");
}

$four = $tree->search(4);
if ($four->parent->getValue() !== 1
    || $four->right->getValue() !== 6
    || $four->left->getValue() !== 2
) {
    throw new Exception("tree search error after delete");
}

echo "test passed\n";