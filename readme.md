## Custom Web Project

Custom web application built on the Laravel PHP Framework for Steger & Bizzell Engineering Inc.

## Additional Notes

#### Directions for pushing to production
+ Change database routing info from root to correct username and password.
+ In app/config/app.php change debug mode to false.
+ Add a . to the htaccess in order to remove /public from the home url
+ If applicable, Modify Stripe API keys and make sure Stripe pages use secure_url(); Set in layouts

#### License

Copyright Cube ATX LLC 2014.