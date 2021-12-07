@extends('layouts.app')

@section('title', tr('New Node'))

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ tr('New Node') }}</div>

    <div class="mdui-row mdui-m-t-5">
        <form action="#" id="new" onsubmit="event.preventDefault();util.wings.locations.nodes.create($(this))">
            <div class="mdui-col-md-6 mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Basic Details') }}</div>

                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">{{ tr('Node Name') }}</label>
                    <input class="mdui-textfield-input" type="text" name="name" />
                    <div class="mdui-textfield-helper">{{ tr('Your node need a name.') }}</div>
                </div>

                <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Where is your new node?') }}</div>
                <select class="mdui-select" name="location_id" mdui-select>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>

                <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Node Visibility') }}</div>
                <p>{{ tr('If checked, the node will be visible.') }}</p>
                <label class="mdui-switch">
                    <input type="checkbox" name="visibility" value="1" />
                    <i class="mdui-switch-icon"></i>
                </label>

                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">{{ tr('FQDN') }}</label>
                    <input class="mdui-textfield-input" type="text" name="fqdn" />
                    <div class="mdui-textfield-helper">
                        {{ tr('Please enter domain name (e.g node.example.com) to be used for connecting to the daemon.') }}
                    </div>
                </div>

                <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Behind Proxy') }}</div>
                <p>{{ tr('If you are running the daemon behind a proxy such as Cloudflare, checked this to have the daemon skip looking for certificates on boot.') }}
                </p>
                <label class="mdui-switch">
                    <input type="checkbox" name="behind_proxy" value="1" />
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
                                value="/var/lib/pterodactyl/volumes" />
                        </div>
                        <div class="mdui-typo-caption-opacity">
                            {{ tr('Enter the directory where server files should be stored. If you use OVH you should check your partition scheme. You may need to use /home/daemon-data to have enough space.') }}
                        </div>
                        <div class="mdui-typo-caption-opacity mdui-m-t-3">
                            {{ tr('Enter the total amount of memory available for new servers. If you would like to allow overallocation of memory enter the percentage that you want to allow. To disable checking for overallocation enter -1 into the field. Entering 0 will prevent creating new servers if it would put the node over the limit.') }}
                        </div>

                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Total Disk Space') }}</label>
                            <input class="mdui-textfield-input" type="text" name="disk" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: MB') }}
                            </div>
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Daemon Port') }}</label>
                            <input class="mdui-textfield-input" type="text" name="daemon_listen" value="8080" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: %') }}
                            </div>
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Daemon SFTP Port') }}</label>
                            <input class="mdui-textfield-input" type="text" name="daemon_sftp" value="2022" />
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Maximum Web Upload Filesize') }}</label>
                            <input class="mdui-textfield-input" type="text" name="upload_size" value="100" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: MB') }}
                            </div>
                        </div>

                    </div>

                    <div class="mdui-col-md-6 mdui-col-sm-6">
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Total Memory') }}</label>
                            <input class="mdui-textfield-input" type="text" name="memory" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: MB') }}
                            </div>
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Memory Over-Allocation') }}</label>
                            <input class="mdui-textfield-input" type="text" name="memory_overallocate" value="0" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: %') }}
                            </div>
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Disk Over-Allocation') }}</label>
                            <input class="mdui-textfield-input" type="text" name="disk_overallocate" value="0" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: %') }}
                            </div>
                        </div>
                        <div class="mdui-typo-caption-opacity mdui-m-t-3">
                            {{ tr('Enter the total amount of disk space available for new servers. If you would like to allow overallocation of disk space enter the percentage that you want to allow. To disable checking for overallocation enter -1 into the field. Entering 0 will prevent creating new servers if it would put the node over the limit.') }}
                        </div>
                        <div class="mdui-typo-caption-opacity mdui-m-t-3">
                            {{ tr('The daemon runs its own SFTP management container and does not use the SSHd process on the main physical server. Do not use the same port that you have assigned for your physical server\'s SSH process. If you will be running the daemon behind CloudFlare® you should set the daemon port to 8443 to allow websocket proxying over SSL.') }}
                        </div>
                        <button
                            class="mdui-m-t-4 mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent mdui-float-right"
                            type="submit">{{ tr('Create Node') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
