@extends('layouts.app')

@section('title', $server->display_name)

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ $server->display_name }}</div>
    @if ($server->status != 'created')
        <div class="logger">
            <span>Listening event.</span>
        </div>
        <button class="mdui-btn mdui-btn-outlined" onclick="util.reload()">{{ tr('Reload') }}</button>
    @else
        <div class="mdui-row mdui-m-t-5">
            <div class="mdui-col-md-6 mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Core Details') }}</div>

                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">{{ tr('Server Name') }}</label>
                    <input class="mdui-textfield-input" type="text" name="name" value="{{ $server->display_name }}" />
                    <div class="mdui-textfield-helper">{{ tr('Your server need a name.') }}</div>
                </div>

            </div>
        </div>

        <div class="mdui-row mdui-m-t-5">
            <div class="mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Application Feature Limits') }}</div>

                <div class="mdui-row">
                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Database Limit') }}</label>
                            <input class="mdui-textfield-input" type="text" name="database_limit" value="1" readonly />
                        </div>
                    </div>

                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Allocation Limit') }}</label>
                            <input class="mdui-textfield-input" type="text" name="allocation_limit"
                                value="{{ $server->allocation_limit }}" />
                            <div class="mdui-textfield-helper">
                                {{ tr('The total number of allocations a user is allowed to create for this server.') }}
                            </div>
                        </div>
                    </div>
                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Backup Limit') }}</label>
                            <input class="mdui-textfield-input" type="text" name="backup_limit"
                                value="{{ $server->backups }}" />
                            <div class="mdui-textfield-helper">
                                {{ tr('The total number of backups that can be created for this server.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mdui-row mdui-m-t-5">
            <div class="mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Resource Management') }}</div>

                <div class="mdui-row">
                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('CPU Limit') }}</label>
                            <input class="mdui-textfield-input" type="text" name="cpu_limit"
                                value="{{ $server->cpu_limit / 100 }}" />
                        </div>
                    </div>

                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Disk Space(MB)') }}</label>
                            <input class="mdui-textfield-input" type="text" name="disk" value="{{ $server->disk }}" />
                        </div>
                    </div>

                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Memory Limit(MB)') }}</label>
                            <input class="mdui-textfield-input" type="text" name="memory"
                                value="{{ $server->memory }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection
