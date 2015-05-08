#CallRailAPI

This API is created using [RESTKit](https://github.com/curiosity26/RESTKit) and is currently only unidirectional.

To use this API, create a CallRail API key within your account, more [details here](http://apidocs.callrail.com/objects/).

Then use the API key with the CallRail object. You can then call down objects from CallRail.

```PHP
<?php
    $token = "abcdefg1394932842";
    $api = new \CallRail\CallRail($token);
    $companies = $api->companies(); // This returns the companies
    $users = $api->users(); // This returns users
    
    // Get a single company by ID
    $company = $api->companies($company_id);
    
    // Get a signle user by ID
    $user = $api->users($user_id);
    
?>
```