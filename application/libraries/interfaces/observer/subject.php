<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

interface Subject {
  function registerObserver( $observer );
  function removeObserver( $observer );
  function notifyObservers();
  function setChanged();
}