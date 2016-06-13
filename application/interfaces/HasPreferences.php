<?php

interface HasPreferences
{
    const WEIGHT = 'weight';
    const COUNT = 'count';
    const ALPHA = 1.0;

    public function getPreferences();
}