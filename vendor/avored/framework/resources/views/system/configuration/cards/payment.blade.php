
<avored-input
    label-text="{{ __('avored::system.configuration.payment.payment_name') }}"
    field-name="site_name"
    init-value="{{ ($repository->getValueByCode('site_name')) ?? '' }}" 
    error-text="{{ $errors->first('site_name') }}"
></avored-input>
