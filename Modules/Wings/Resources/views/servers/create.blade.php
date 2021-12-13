@extends('layouts.app')

@section('title', tr('New Server'))

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ tr('New Server') }}</div>
    <form action="#" id="new" onsubmit="event.preventDefault();m.create($(this))">
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
                    @foreach ($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->username }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="mdui-row mdui-m-t-5">
            <div class="mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Allocation Management') }}</div>

                <div class="mdui-row">
                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-typo-body-1 mdui-m-b-1">{{ tr('Location') }}</div>

                        <select class="mdui-select" mdui-select name="location" onchange="m.getNodes($(this).val())">
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-typo-body-1 mdui-m-b-1">{{ tr('Node') }}</div>

                        <select class="mdui-select" name="node" id="nodes_select">
                            <option disabled>{{ tr('Select location first.') }}</option>
                        </select>

                        <div class="mdui-typo-body-1 mdui-m-t-1">
                            {{ tr('The main allocation that will be assigned to this server automatically.') }}</div>

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
                            <label class="mdui-textfield-label">{{ tr('Disk Space(MB)') }}</label>
                            <input class="mdui-textfield-input" type="text" name="disk" value="1024" />
                        </div>
                    </div>

                    <div class="mdui-col-xs-6 mdui-col-sm-4">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Memory Limit(MB)') }}</label>
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

                        <select class="mdui-select" mdui-select="{position: 'top'}" name="nest" id="nest_select"
                            onchange="m.getEggs($(this).val())">
                            @foreach ($nests as $nest)
                                <option value="{{ $nest->id }}">{{ $nest->name }}</option>
                            @endforeach
                        </select>

                        <select class="mdui-select" name="egg" id="egg_select" onchange="m.getImages($(this).val())">
                        </select>
                    </div>

                    <div class="mdui-col-xs-6">
                        <div class="mdui-typo-headline">{{ tr('Docker Image') }}</div>

                        <select class="mdui-select" name="docker_image" id="docker_images">
                        </select>

                    </div>
                </div>
            </div>
        </div>

        <button class="mdui-float-right mdui-m-t-4 mdui-btn mdui-ripple mdui-btn-outlined"
            type="submit">{{ tr('Create Server') }}</button>

    </form>

    <script>
        m = {
            getNodes: (location_id) => {
                $.get({
                    url: route('wings.locations.nodes', location_id),
                    success(data) {
                        if (!data.status) {
                            return false;
                        }

                        let html;

                        for (let i in data.data) {
                            html += `
                                <option value="${data.data[i].id}">${data.data[i].display_name}</option>
                            `;
                        }

                        $('#nodes_select').html(html)
                    }
                });
            },
            getEggs: (nest_id) => {
                $.get({
                    url: route('wings.nests.list', nest_id),
                    success(data) {
                        let html = ' <option value="0">Choose Egg</option>';

                        for (let i in data.data) {
                            html += `
                                <option value="${data.data[i].id}">${data.data[i].name}</option>
                            `;
                        }
                        $('#egg_select').html(html)
                    }
                });
            },
            getImages: (egg_id) => {
                $.get({
                    url: route('wings.egg.images', egg_id),
                    success(data) {
                        let html;

                        for (let i in data.data.docker_images) {
                            html += `
                                <option value="${i}">${data.data.docker_images[i]}</option>
                            `;
                        }

                        $('#docker_images').html(html)
                    }
                });
            },
            create: (ele) => {
                $.ajax({
                    method: 'POST',
                    url: route('teams.team.store'),
                    data: {
                        name: value,
                    },
                    success(data) {

                    }
                });
            }
        }
    </script>

@endsection
