<div>
    
@if ( Auth::guard('penduduk')->check())
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img src="{{ $penduduk->picture}}" alt="" />
							</span>
							<span class="user-name">{{ $penduduk->name }}</span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="{{ route('penduduk.profile')}}"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="{{ route('penduduk.profile')}}"
								><i class="dw dw-settings2"></i> Setting</a
							>
							<a class="dropdown-item" href="faq.html"
								><i class="dw dw-help"></i> Help</a
							>
							<a class="dropdown-item" href="{{ route('penduduk.logout_handler') }}"
								onclick="event.preventDefault();document.getElementById('pendudukLogoutForm').
								submit();"><i class="dw dw-logout"></i> Log Out</a
							>
							<form action="{{ route('penduduk.logout_handler' ) }}" id="pendudukLogoutForm"
							method="POST">@csrf</form>
						</div>
					</div>
				</div>
				@elseif ( Auth::guard('penduduk')->check())
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img src="/back/vendors/images/photo1.jpg" alt="" />
							</span>
							<span class="user-name">Ross C. Lopez</span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="{{ route('penduduk.profile') }}"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="{{ route('penduduk.profile') }}"
								><i class="dw dw-settings2"></i> Setting</a
							>
							<a class="dropdown-item" href="faq.html"
								><i class="dw dw-help"></i> Help</a
							>
							<a class="dropdown-item" href="{{ route('penduduk.logout_handler') }}"
								onclick="event.preventDefault();document.getElementById('pendudukLogoutForm').
								submit();"><i class="dw dw-logout"></i> Log Out</a
							>
							<form action="{{ route('penduduk.logout_handler' ) }}" id="pendudukLogoutForm"
							method="POST">@csrf</form>
						</div>
					</div>
				</div>
				@endif
</div>
