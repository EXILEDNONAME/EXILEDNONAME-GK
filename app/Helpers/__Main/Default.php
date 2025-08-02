<?php

use App\Models\Backend\__Main\Broadcaster\Member;

function BroadcasterMembers() {
  $items = DB::table('main_broadcaster_members')->orderBy('name','asc')->where('active', 1)->pluck('name', 'id')->toArray();
  return $items;
}
