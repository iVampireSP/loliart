@extends('layouts.app')

@section('title', tr('Edit Node') . ': ' . $node->display_name)

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ $node->display_name }}</div>

    <div class="mdui-tab" mdui-tab>
        <a href="#node-about" class="mdui-ripple">{{ tr('About') }}</a>
        <a href="#node-settings" class="mdui-ripple">{{ tr('Settings') }}</a>
        <a href="#node-config" class="mdui-ripple">{{ tr('Configuration') }}</a>
        <a href="#node-allocation" class="mdui-ripple">{{ tr('Allocations') }} </a>
        <a href="#delete-node" class="mdui-ripple">{{ tr('Delete Node') }}</a>
    </div>

    <div id="node-about">
        <div class="mdui-row">
            <div class="mdui-col-md-6 mdui-col-sm-12">
                <div class="mdui-typo-headline mdui-m-t-3">{{ tr('Information') }}</div>

                <div class="mdui-table-fluid mdui-m-t-2">
                    <table class="mdui-table mdui-table-hoverable">
                        <tbody class="mdui-typo">
                            <tr>
                                <td>{{ tr('Daemon Version') }}</td>
                                <td>{{ $node->version }}</td>
                            </tr>
                            <tr>
                                <td>{{ tr('System Information') }}</td>
                                <td>{{ $node->os }} ({{ $node->architecture }})
                                    <code>{{ $node->kernel_version }}</code>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ tr('Total CPU Threads') }}</td>
                                <td>{{ $node->cpu_count }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mdui-col-md-6 mdui-col-sm-12">
                <div class="mdui-typo-headline mdui-m-t-3">At-a-Glance</div>
                @php($allocated = Cache::get('wings_node_' . $node->node_id)['attributes']['allocated_resources'] ?? ['memory' => 0, 'disk' => 0])
                <div class="mdui-table-fluid mdui-m-t-2">
                    <table class="mdui-table mdui-table-hoverable">
                        <tbody class="mdui-typo">
                            <tr>
                                <td>{{ tr('DISK SPACE ALLOCATED') }}</td>
                                <td>
                                    {{ $allocated['disk'] }} / {{ $node->disk }} Mb
                                    <div class="mdui-progress">
                                        <div class="mdui-progress-determinate"
                                            style="width: {{ ($allocated['disk'] / $node->disk) * 100 }}%;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ tr('MEMORY ALLOCATED') }}</td>
                                <td>
                                    {{ $allocated['memory'] }} / {{ $node->memory }} Mb
                                    <div class="mdui-progress">
                                        <div class="mdui-progress-determinate"
                                            style="width: {{ ($allocated['memory'] / $node->memory) * 100 }}%;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ tr('TOTAL SERVERS') }}</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="mdui-row mdui-m-t-5" id="node-settings">
        <x-lock for="node-edit" lock="1" />

        <form action="#" data-lock-form="node-edit"
            onsubmit="event.preventDefault();util.wings.locations.nodes.edit($(this))">
            <div class="mdui-col-md-6 mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Basic Details') }}</div>

                <div class="mdui-textfield">
                    <label class="mdui-textfield-label">{{ tr('Node Name') }}</label>
                    <input class="mdui-textfield-input" type="text" name="name" value="{{ $node->display_name }}" />
                    <div class="mdui-textfield-helper">{{ tr('Your node need a name.') }}</div>
                </div>

                <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Where is your new node?') }}</div>
                <select class="mdui-select" name="location_id" mdui-select>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" @if ($node->location_id == $location->id) selected @endif>{{ $location->name }}</option>
                    @endforeach
                </select>

                <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Node Visibility') }}</div>
                <p>{{ tr('If checked, the node will be visible.') }}</p>
                <label class="mdui-switch">
                    <input type="checkbox" name="visibility" value="1" @if ($node->visibility) checked @endif />
                    <i class="mdui-switch-icon"></i>
                </label>

                <div class="mdui-textfield">
                    <label class="mdui-textfield-label">{{ tr('FQDN') }}</label>
                    <input class="mdui-textfield-input" type="text" name="fqdn" value="{{ $node->fqdn }}" />
                    <div class="mdui-textfield-helper">
                        {{ tr('Please enter domain name (e.g node.example.com) to be used for connecting to the daemon.') }}
                    </div>
                </div>

                <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Behind Proxy') }}</div>
                <p>{{ tr('If you are running the daemon behind a proxy such as Cloudflare, checked this to have the daemon skip looking for certificates on boot.') }}
                </p>
                <label class="mdui-switch">
                    <input type="checkbox" name="behind_proxy" value="1" @if ($node->behind_proxy) checked @endif />
                    <i class="mdui-switch-icon"></i>
                </label>

                <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Maintenance Mode') }}</div>
                <p>{{ tr('If the node is marked as \'Under Maintenance\' users won\'t be able to access servers that are on this node.') }}
                </p>
                <label class="mdui-switch">
                    <input type="checkbox" name="maintenance_mode" value="1" @if ($node->maintenance_mode) checked @endif />
                    <i class="mdui-switch-icon"></i>
                </label>


            </div>

            <div class="mdui-col-md-6 mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Configuration') }}</div>
                <div class="mdui-row">
                    <div class="mdui-col-md-6 mdui-col-sm-6">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Daemon Server File Directory') }}</label>
                            <input class="mdui-textfield-input" type="text" name="daemon_base"
                                value="{{ $node->daemon_base }}" />
                        </div>
                        <div class="mdui-typo-caption-opacity">
                            {{ tr('Enter the directory where server files should be stored. If you use OVH you should check your partition scheme. You may need to use /home/daemon-data to have enough space.') }}
                        </div>
                        <div class="mdui-typo-caption-opacity mdui-m-t-3">
                            {{ tr('Enter the total amount of memory available for new servers. If you would like to allow overallocation of memory enter the percentage that you want to allow. To disable checking for overallocation enter -1 into the field. Entering 0 will prevent creating new servers if it would put the node over the limit.') }}
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Total Disk Space') }}</label>
                            <input class="mdui-textfield-input" type="text" name="disk" value="{{ $node->disk }}" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: MB') }}
                            </div>
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Daemon Port') }}</label>
                            <input class="mdui-textfield-input" type="text" name="daemon_listen"
                                value="{{ $node->daemon_listen }}" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: %') }}
                            </div>
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Daemon SFTP Port') }}</label>
                            <input class="mdui-textfield-input" type="text" name="daemon_sftp"
                                value="{{ $node->daemon_sftp }}" />
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Maximum Web Upload Filesize') }}</label>
                            <input class="mdui-textfield-input" type="text" name="upload_size"
                                value="{{ $node->upload_size }}" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: MB') }}
                            </div>
                        </div>

                    </div>

                    <div class="mdui-col-md-6 mdui-col-sm-6">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Total Memory') }}</label>
                            <input class="mdui-textfield-input" type="text" name="memory" value="{{ $node->memory }}" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: MB') }}
                            </div>
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Memory Over-Allocation') }}</label>
                            <input class="mdui-textfield-input" type="text" name="memory_overallocate"
                                value="{{ $node->memory_overallocate }}" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: %') }}
                            </div>
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Disk Over-Allocation') }}</label>
                            <input class="mdui-textfield-input" type="text" name="disk_overallocate"
                                value="{{ $node->disk_overallocate }}" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: %') }}
                            </div>
                        </div>

                        <div class="mdui-typo-caption-opacity mdui-m-t-3">
                            {{ tr('Enter the total amount of disk space available for new servers. If you would like to allow overallocation of disk space enter the percentage that you want to allow. To disable checking for overallocation enter -1 into the field. Entering 0 will prevent creating new servers if it would put the node over the limit.') }}
                        </div>
                        <div class="mdui-typo-caption-opacity mdui-m-t-3">
                            {{ tr('The daemon runs its own SFTP management container and does not use the SSHd process on the main physical server. Do not use the same port that you have assigned for your physical server\'s SSH process. If you will be running the daemon behind CloudFlare® you should set the daemon port to 8443 to allow websocket proxying over SSL.') }}
                        </div>

                        <button class="mdui-m-t-4 mdui-btn mdui-ripple mdui-btn-outlined"
                            type="submit">{{ tr('Update Node') }}</button>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="node-config" class="mdui-m-t-5">
        <div class="mdui-typo-headline">{{ tr('Configuration File') }}</div>
        <p>{{ tr('This file should be placed in your daemon\'s root directory (usually /etc/pterodactyl) in a file called config.yml.') }}
        </p>

        <div class="mdui-textfield">
            <textarea readonly class="mdui-textfield-input blur">{!! $node_configuration !!}</textarea>
            <div class="mdui-textfield-helper">{{ tr('This field should be security sensitive, Please use ') }} <kbd>Ctrl
                    + C {{ tr('to copy the configuration.') }}</kbd></div>
        </div>
    </div>

    <div id="node-allocation">
        <div class="mdui-typo-headline mdui-m-t-3">{{ tr('Existing Allocations') }}</div>

        <div class="mdui-table-fluid mdui-m-t-2 existing-allocations">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ tr('IP Address') }}</th>
                        <th>{{ tr('IP Alias') }}</th>
                        <th>{{ tr('Port') }}</th>
                        <th>{{ tr('Assigned To Server') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allocations as $allocation)
                        <tr>
                            <td>{{ $allocation->id }}</td>
                            <td>{{ $allocation->ip }}</td>
                            <td>{{ $allocation->alias }}</td>
                            <td>{{ $allocation->port }}</td>
                            <td>{{ $allocation->server_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="delete-node" class="mdui-m-t-5">
        <button class="mdui-btn btn-ripple mdui-btn-outlined"
            onclick="util.wings.locations.nodes.delete({{ $node->id }}, {{ $node->location_id }})">{{ tr('Delete') }}</button>
    </div>

@endsection
