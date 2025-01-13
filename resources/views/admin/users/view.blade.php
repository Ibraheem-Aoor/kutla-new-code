<div class="modal fade" id="user-view">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ __('View User') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body order-form-section">
                <div class="costing-list">
                    <ul>
                        <li><span>{{ __('Name') }}</span> <span>:</span> <span id="staff_view_name"></span></li>
                        <li><span>{{ __('Phone') }}</span> <span>:</span> <span id="staff_view_phone_number"></span>
                        </li>

                        <li><span>{{ __('Email') }}</span> <span>:</span> <span id="staff_view_email_number"></span>
                        </li>

                        <li><span>{{ __('Role') }}</span> <span>:</span> <span id="staff_view_role"></span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
