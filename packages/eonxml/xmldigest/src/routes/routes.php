<?php

Route::get('xml-digest', ['as'=>'xmlDigest', 'uses'=>'Eonxml\Xmldigest\Http\Controller\XmlDigestController@index']);
Route::post('/xml-post', ['as' => 'postXml', 'uses' => 'Eonxml\Xmldigest\Http\Controller\XmlDigestController@createFromXml']);
