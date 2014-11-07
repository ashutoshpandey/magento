<?php

class ChatSession extends Eloquent{

	protected $table = 'chat_sessions';

    public function appointment()
    {
        return $this->belongsTo('Appointment');
    }
}