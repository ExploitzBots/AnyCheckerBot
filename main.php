<?php

ob_start();

///////////===[IMPORTING RESOURCES]===///////////

include "./Resources/Vars.php";
include "./Resources/Functions.php";
define('API_KEY',$API_KEY);


///////////===[IMPORTING PLUGINS]===///////////

include "./Plugins/bin.php";
include "./Plugins/iban.php";

////////////////=========[START MESSAGE]=========////////////////

if(strpos($text, "/start") === 0){
    bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Heya $from_fname,

I'm $USERNAMEBOT. I am Helper Of Binner!

Click Help Button To Use Me :</b>",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"⚙️ Help",'callback_data'=>"help"]],[['text'=>"Our Channel 📡",'url'=>"https://t.me/EvilzBots"]
  ],'resize_keyboard'=>true])
	
  ]);


//////////////////////////////////////////////

if (isset($TG_DUMP_CHAT)) {

    bot('sendmessage',[
	'chat_id'=>$TG_DUMP_CHAT,
	'text'=>"<b>User Started Bot</b>

First Name:- $from_fname
User Name:- @$username2
User ID:- <code>$from_id</code>
Current Time:- <code>$date1</code>",
	'parse_mode'=>'html',
	
  ]);
}

}

////////////////=========[HELP MENU]=========////////////////

if($data == "help"){ //Sends Help Menu if Help Button is clicked
	bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"<b>Hello there! I'm $USERNAMEBOT
am Helper Of Binner!</b>

I Can Check Bins & Ibans",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"Bin Checker",'callback_data'=>"bin"],['text'=>"IBAN Checker",'callback_data'=>"iban"]],
	],'resize_keyboard'=>true])
	]);
}


////////////////=========[HELP MENU]=========////////////////

if(strpos($text, "/help") === 0){ //Sends Help Menu if User sent /help. 
	bot('sendmessage',[    //Can't use "OR" Operator because it edits the Message in Callback Query and Sends Message in /help.
	'chat_id'=>$chat_id,
	'text'=>"<b>Hello there! I'm $USERNAMEBOT
I am Helper Of Binner!</b>

I Can Check Bins & Ibans",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"Bin Checker",'callback_data'=>"bin"],['text'=>"IBAN Checker",'callback_data'=>"iban"]],
	],'resize_keyboard'=>true])
	]);
}

////////////////=========[BIN INFO]=========////////////////

if($data == "bin"){
	bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"<b>🌀 Bin Checker 🌀

Command:</b>

/bin <code>&lt;bin&gt;</code> - Checks the Bin and Provides Information",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"Return",'callback_data'=>"help"]],
	],'resize_keyboard'=>true])
	]);
}


////////////////=========[COVID-19 STATS]=========////////////////


////////////////=========[IBAN CHECKER]=========////////////////

if($data == "iban"){
	bot('editMessageText',[
	'chat_id'=>$chatid,
	'message_id'=>$messageid,
	'text'=>"<b>🌀 IBAN Checker 🌀

Command:</b>

/iban <code>&lt;iban&gt;</code> - Checks if the Provided IBAN is Valid or Invalid.",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode(['inline_keyboard'=>[
	[['text'=>"Return",'callback_data'=>"help"]],
	],'resize_keyboard'=>true])
	]);
}



?>
