<div class="iq-team text-center mb-5">
    <div class="iq-provider-img position-relative">
      <a
        href="{{ route('provider.detail', $data->id) }}"
        class="position-absolute w-100 h-100 start-0 top-0 d-block"
      ></a>
      <img
        src="{{ getSingleMedia($data,'profile_image', null) }}"
        alt="provider"
        class="provider-img img-fluid object-cover rounded-3 w-100"
        loading="lazy"
      />
      <div class="rating gap-1">

        @php $rating = round($providers_service_rating, 1); @endphp

        @foreach(range(1,5) as $i)
            <span class="fa-stack" style="width:1em">
                <i class="far fa-star fa-stack-1x"></i>
                @if($rating >0)
                @if($rating >0.5)
                <i class="fas fa-star fa-stack-1x"></i>
                @else
                <i class="fas fa-star-half fa-stack-1x"></i>
                @endif
                @endif
                @php $rating--; @endphp
            </span>
        @endforeach
        ({{ round($providers_service_rating,1) }})
      </div>
    </div>
    <div class="provider-info">
      <div class="d-flex align-items-center justify-content-center mt-3 gap-1">
        <a href="{{ route('provider.detail', $data->id) }}" class="d-block">
          <h5 class="provider-heading line-count-1">{{ $data->display_name }}</h5>
        </a>
        @php
            $providerDocuments = $data->providerDocument ?? null;
            $verifiedDisplayed = false; // Boolean flag to check if the verified icon has been displayed
        @endphp

        @if($providerDocuments)
            @foreach ($providerDocuments as $document)
                @if ($document->is_verified && !$verifiedDisplayed)
                    @php
                        $verifiedDisplayed = true; // Set the flag to true after displaying the icon
                    @endphp
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none" class="text-primary">
                        <path d="M15.8905 7.50531C15.647 7.3637 15.4281 7.18334 15.2425 6.97131C15.2613 6.67612 15.3316 6.3865 15.4503 6.11556C15.6685 5.49981 15.9153 4.80231 15.5193 4.26006C15.1233 3.71781 14.3755 3.73506 13.7193 3.75006C13.4293 3.7799 13.1364 3.76011 12.853 3.69156C12.7021 3.44594 12.5943 3.1763 12.5343 2.89431C12.3483 2.26056 12.136 1.54431 11.4843 1.32981C10.8558 1.12731 10.2738 1.57281 9.7593 1.96431C9.53729 2.16705 9.28005 2.32744 9.0003 2.43756C8.71762 2.32834 8.45752 2.1679 8.23305 1.96431C7.72005 1.57506 7.1403 1.12506 6.5088 1.33056C5.85855 1.54206 5.6463 2.26056 5.4588 2.89431C5.3989 3.17538 5.29216 3.44438 5.14305 3.69006C4.85918 3.75843 4.56587 3.77871 4.2753 3.75006C3.6168 3.73206 2.87505 3.71256 2.4753 4.26006C2.07555 4.80756 2.3253 5.49981 2.5443 6.11481C2.66463 6.38534 2.73599 6.67509 2.75505 6.97056C2.56986 7.18287 2.35123 7.3635 2.1078 7.50531C1.5588 7.88031 0.935547 8.30706 0.935547 9.00006C0.935547 9.69306 1.5588 10.1183 2.1078 10.4948C2.35117 10.6364 2.5698 10.8168 2.75505 11.0288C2.73799 11.3242 2.66866 11.6142 2.5503 11.8853C2.3328 12.5003 2.0868 13.1978 2.48205 13.7401C2.8773 14.2823 3.6228 14.2651 4.28205 14.2501C4.57227 14.2202 4.86546 14.24 5.14905 14.3086C5.29933 14.5544 5.40686 14.824 5.46705 15.1058C5.65305 15.7396 5.8653 16.4558 6.51705 16.6703C6.62154 16.7038 6.73057 16.721 6.8403 16.7213C7.3677 16.6456 7.85789 16.4058 8.2413 16.0358C8.4633 15.8331 8.72054 15.6727 9.0003 15.5626C9.28298 15.6718 9.54308 15.8322 9.76755 16.0358C10.2813 16.4281 10.8633 16.8758 11.4925 16.6696C12.1428 16.4581 12.355 15.7396 12.5425 15.1066C12.6027 14.825 12.7102 14.5556 12.8605 14.3101C13.1433 14.2412 13.4357 14.2209 13.7253 14.2501C14.3838 14.2658 15.1255 14.2876 15.5253 13.7401C15.925 13.1926 15.6753 12.5003 15.4563 11.8846C15.3368 11.6143 15.2655 11.3252 15.2455 11.0303C15.4308 10.8178 15.6498 10.6372 15.8935 10.4956C16.4425 10.1206 17.0658 9.69306 17.0658 9.00006C17.0658 8.30706 16.4403 7.88106 15.8905 7.50531Z" fill="currentColor"/>
                        <path d="M8.25062 11.0625C8.17674 11.0626 8.10357 11.0481 8.03534 11.0198C7.96711 10.9915 7.90518 10.9499 7.85312 10.8975L6.35312 9.3975C6.25376 9.29087 6.19966 9.14984 6.20224 9.00411C6.20481 8.85838 6.26384 8.71935 6.3669 8.61629C6.46996 8.51323 6.609 8.45419 6.75473 8.45162C6.90045 8.44905 7.04149 8.50314 7.14812 8.6025L8.30312 9.7575L10.9131 7.8C11.0325 7.71049 11.1825 7.67206 11.3302 7.69316C11.4779 7.71425 11.6111 7.79316 11.7006 7.9125C11.7901 8.03185 11.8286 8.18187 11.8075 8.32955C11.7864 8.47724 11.7075 8.61049 11.5881 8.7L8.58812 10.95C8.49073 11.023 8.37232 11.0624 8.25062 11.0625Z" fill="white"/>
                    </svg>
                @endif
            @endforeach
        @endif
      </div>
      <h6 class="text-primary text-capitalize mt-2 line-count-1">{{ $data->designation }}</h6>
    </div>
  </div>
