<?php
/**
 * Rewindable Entity Iterator
 *
 * @author Alex Artushin <artushin@gmail.com>
 */

namespace org\mizer;

class RewindableEntityIterator extends EntityIterator
{

    /**
     * @var array data storage
     */
    protected $data = array();


    /**
     * rewind back to index 0
     */
    public function rewind() {
        $this->index = -1;
        $this->next();
        return;
    }

    /**
     * Store the result if it is not yet in $data
     * set next to be the result
     * advance the pointer
     *
     * @return Object
     */
    public function next() {
        if (isset($this->data[$this->index])){
            $this->next = $this->data[$this->index];
        }
        else{
            parent::next();
            $this->data[$this->index] = $this->next;
        }
        $this->index++;
        return $this->next;
    }

}

