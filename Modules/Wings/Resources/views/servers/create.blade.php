@extends('layouts.app')

@section('title', tr('New Server'))

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ tr('New Server') }}</div>
    <form action="#" id="new" onsubmit="event.preventDefault();util.wings.servers.create($(this))">
        <div class="mdui-row mdui-m-t-5">
            <div class="mdui-col-md-6 mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Core Details') }}</div>

                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">{{ tr('Server Name') }}</label>
                    <input class="mdui-textfield-input" type="text" name="name" />
                    <div class="mdui-textfield-helper">{{ tr('Your server need a name.') }}</div>
                </div>

            </div>

            <div class="mdui-col-md-6 mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Who is the owner of this server?') }}</div>
                <select class="mdui-select" mdui-select style="margin-top: 34px;" name="owner">
                    <option value="1">State 1</option>
                    <option value="2">State 2</option>
                </select>
            </div>
        </div>


        <div class="mdui-row mdui-m-t-5">
            <div class="mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Allocation Management') }}</div>

                <div class="mdui-row">
                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-typo-body-1 mdui-m-b-1">{{ tr('Node') }}</div>
                        <select class="mdui-select" mdui-select name="owner">
                            <option value="1">State 1</option>
                            <option value="2">State 2</option>
                        </select>
                        <div class="mdui-typo-body-1 mdui-m-t-1">
                            {{ tr('The node which this server will be deployed to.') }}</div>

                    </div>

                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-typo-body-1 mdui-m-b-1">{{ tr('Default Allocation') }}</div>
                        <select class="mdui-select" mdui-select name="default_allocation">
                            <option value="1">State 1</option>
                            <option value="2">State 2</option>
                        </select>
                        <div class="mdui-typo-body-1 mdui-m-t-1">
                            {{ tr('The main allocation that will be assigned to this server.') }}</div>

                    </div>
                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-typo-body-1 mdui-m-b-1">{{ tr('Additional Allocation(s)') }}</div>
                        <div class="mdui-typo-body-1 mdui-m-t-1">
                            {{ tr('Additional allocations can be assigned to this server after the server created.') }}
                        </div>
                    </div>
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
                            <input class="mdui-textfield-input" type="text" name="database_limit" />
                            <div class="mdui-textfield-helper">
                                {{ tr('The total number of databases a user is allowed to create for this server.') }}
                            </div>
                        </div>
                    </div>

                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Allocation Limit') }}</label>
                            <input class="mdui-textfield-input" type="text" name="allocation_limit" />
                            <div class="mdui-textfield-helper">
                                {{ tr('The total number of allocations a user is allowed to create for this server.') }}
                            </div>
                        </div>
                    </div>
                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Backup Limit') }}</label>
                            <input class="mdui-textfield-input" type="text" name="backup_limit" />
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
                            <input class="mdui-textfield-input" type="text" name="cpu_limit" value="1" />
                        </div>
                    </div>

                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Disk Space') }}</label>
                            <input class="mdui-textfield-input" type="text" name="disk" value="1024" />
                        </div>
                    </div>

                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Memory Limit') }}</label>
                            <input class="mdui-textfield-input" type="text" name="memory" value="1024" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mdui-row mdui-m-t-5">
            <div class="mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Build Configuration') }}</div>

                <div class="mdui-row">
                    <div class="mdui-col-xs-6">
                        <div class="mdui-typo-headline">Nest</div>

                        <select class="mdui-select" mdui-select name="nest">
                            <option value="1">State 1</option>
                            <option value="2">State 2</option>
                        </select>

                        <select class="mdui-select" mdui-select name="egg">
                            <option value="1">State 1</option>
                            <option value="2">State 2</option>
                        </select>
                    </div>

                    <div class="mdui-col-xs-6">
                        <div class="mdui-typo-headline">{{ tr('Docker Image') }}</div>

                        <select class="mdui-select" mdui-select name="nest">
                            <option value="1">State 1</option>
                            <option value="2">State 2</option>
                        </select>

                    </div>
                </div>
            </div>
        </div>

        <button class="mdui-float-right mdui-m-t-4 mdui-btn mdui-ripple mdui-btn-outlined"
            type="submit">{{ tr('Create Server') }}</button>

    </form>

@endsection
