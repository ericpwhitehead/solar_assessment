<?php

it('has a home page')->get('/')->assertStatus(200);
