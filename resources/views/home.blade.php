@extends('layouts.app')
@section('page-style')
<style media="screen">
    .container.top-container {
        width: 100%;
    }

    .online {
        color: #32CD32;
    }

    .box-style {
        height: 100%;
        position: fixed;
        z-index: 1;
        top: 0;
        overflow-x: hidden;
        padding-top: 50px;
    }

    .box-left-side {
        left: 0;
        width: 18em;
    }

    .box-right-side {
        right: 0;
        width: calc(100vw - 18em);
    }

    .chat_box {
        width: calc(100vw - 18em);
        padding: 3px 0 1px;
        position: fixed;
        top: 48px;
        left: 18em;
        height: 100%;
    }

    .direct-chat-primary {
        height: calc(100% - 48px);
    }

    .direct-chat .box-body {
        height: calc(100% - 101px);
        background: aliceblue;
    }

    .direct-chat-messages {
        height: 100%;
    }
</style>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="chatApp">
            <div class="panel panel-default box-style box-left-side">
                <div class="panel-heading">Users</div>
                <div class="panel-body" style="padding:0px;">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="chatList in chatLists" style="cursor: pointer;" @click="chat(chatList)">
                            @{{ chatList.name }}
                            <i class="fa fa-circle pull-right" v-bind:class="{'online': (chatList.online=='Y')}"></i>
                            <span class="badge" v-if="chatList.msgCount !=0">@{{ chatList.msgCount }}</span>
                        </li>
                        <li class="list-group-item" v-if="socketConnected.status == false">@{{ socketConnected.msg }}</li>
                    </ul>
                </div>
            </div>
            <div id="chat_box_container" class="box-style box-right-side"></div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script src="{{ asset('js/chat.js') }}" charset="utf-8"></script>
@stop