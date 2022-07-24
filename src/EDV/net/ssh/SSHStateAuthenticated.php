<?php
namespace EDV\net\ssh;

class SSHStateAuthenticated extends SSHStateConnected
{
    /*
     * (non-PHPdoc) @see \EDV\net\ssh\AbstractSSHState::getDirectoryIterator()
     */
    public function getDirectoryIterator($path)
    {
        return new SSHDirectoryIterator($this->resource, $path);
    }
}