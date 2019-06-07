<?php



class Item
{
    public function getDescirption()
    {
        return $this->getID() . $this->getToken();
    }

    protected  function getID()
    {
        return rand();
    }

    private function getToken()
    {
        return uniqid();
    }

    private function getPrefixedToken(string $prefixed)
    {
        return uniqid($prefixed);
    }
}