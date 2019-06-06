@foreach($resources as $resource)
    <router-link tag="h3"
                 :to="{
                     name: 'index',
                     params:
                        {
                            resourceName: '{{ $resource['resource']::uriKey() }}'
                        }
                 }"
                 class="cursor-pointer flex items-center font-normal dim text-white mb-6 text-base no-underline">
        <div class="sidebar-icon">
            {!! $resource['image'] !!}
        </div>
        <span class="sidebar-label">
            {{ $resource['resource']::label() }}
        </span>
    </router-link>
@endforeach
