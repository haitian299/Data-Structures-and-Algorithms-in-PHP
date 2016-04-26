<?php namespace BinarySearchTree;
/**
 * Created by PhpStorm.
 * User: haitian
 * Date: 16/4/26
 * Time: 09:40
 */
require_once "Node.php";

class BinarySearchTree
{
    protected $size;
    protected $head;

    public function __construct(Node $node = null)
    {
        if (!is_null($node)) {
            $this->head = $node;
            $this->size = 1;
        }
    }

    public function getSize()
    {
        return $this->size;
    }

    public function insert($value)
    {
        $node = new Node($value);
        if (is_null($this->head)) {
            $this->head = $node;
            $this->size = $this->size + 1;

            return $this;
        }

        $head = $this->head;

        while (true) {
            if ($node->compare($head) === -1) {
                if (is_null($head->left)) {
                    $head->left = $node;
                    $node->parent = $head;
                    break;
                } else {
                    $head = $head->left;
                }
            } else {
                if (is_null($head->right)) {
                    $head->right = $node;
                    $node->parent = $head;
                    break;
                } else {
                    $head = $head->right;
                }
            }
        }

        $this->size = $this->size + 1;

        return $this;
    }

    public function search($value)
    {
        $head = $this->head;
        $node = new Node($value);

        while (!is_null($head)) {
            switch ($head->compare($node)) {
                case -1:
                    $head = $head->right;
                    break;
                case 1:
                    $head = $head->left;
                    break;
                case 0:
                    return $head;
                default:
                    return null;
            }
        }

        return null;
    }

    public function delete($value)
    {
        $parent = null;

        $head = $this->head;
        $node = new Node($value);

        while (!is_null($head)) {
            switch ($node->compare($head)) {
                case -1:
                    $parent = $head;
                    $head = $head->left;
                    break;
                case 1:
                    $parent = $head;
                    $head = $head->right;
                    break;
                case 0:
                    if (!is_null($head->left)) {
                        $right = $head->right;
                        $head->setValue($head->left->getValue());
                        $head->left = $head->left->left;
                        $head->right = $head->left->right;

                        if (!is_null($right)) {
                            $subTree = new BinarySearchTree($head);
                            $this->iterOnTree($right, function (Node $node) use ($subTree) {
                                $subTree->insert($node->getValue());
                            });
                        }
                        $this->size = $this->size - 1;

                        return true;
                    }
                    if (!is_null($head->right)) {
                        $head->setValue($head->right->getValue());
                        $head->left = $head->right->left;
                        $head->right = $head->right->right;

                        $this->size = $this->size - 1;

                        return true;
                    }
                    if (is_null($parent)) {
                        $this->head = null;
                        $this->size = $this->size - 1;

                        return true;
                    }

                    if ($parent->left == $node) {
                        $parent->left = null;
                    } else {
                        $parent->right = null;
                    }

                    $this->size = $this->size - 1;

                    return true;
            }
        }

        return false;

    }

    protected function iterOnTree(Node $node, callable $callback)
    {
        if (is_null($node)) {
            return true;
        }

        if (!$this->iterOnTree($node->left, $callback)) {
            return false;
        }

        $callback($node);

        return $this->iterOnTree($node->right, $callback);
    }
}