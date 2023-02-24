
## Project File Structure

Our project is organized into directories, each directory has its own purpose.

Here is a breakdown of file structure in this project.


```
+---assets
|   +---css
|   +---fonts
|   +---images
|   +---js
|   +---libs
|
+---classes
|   +---authentication
|   +---categories
|   +---helpers
|   +---passwords
|   +---users
|
+---functions
|   +---requests
|   +---validators
|           
+---include
|           
+---javascript
|   +---helpers
|   +---managers
|   +---requests
|   +---security
|   +---validators
|           
+---public
|   +---categories-add
|   +---categories-edit
|   +---categories-list
|   +---dashboard
|   +---failed-logins
|   +---lock-mode
|   +---login
|   +---passwords-add
|   +---passwords-edit
|   +---passwords-list
|   +---register
|   +---successful-logins
|   ---- logout.php
|               
+---settings
```

---

## Assets directory breakdown

```
+---assets
|   +---css
|   +---fonts
|   +---images
|   +---js
|   +---libs
```

The assets directory contains files for the whole project.
* `css` styling files.
* `fonts` fonts.
* `images` images used in project.
* `js` javascript files
* `libs` javascript libraries used in project.

---

## Classes directory breakdown

The `classes` directory contains all server classes used in project.

```
+---classes
|   +---authentication
|   |       FailedLogins.php
|   |       Login.php
|   |       PinCode.php
|   |       Session.php
|   |       SuccessfulLogin.php
|   |       
|   +---categories
|   |       Categories.php
|   |       
|   +---helpers
|   |       Encryption.php
|   |       Generators.php
|   |       
|   +---passwords
|   |       Passwords.php
|   |       
|   +---users
|           Users.php
```

#### authentication directory breakdown.

* `FailedLogins` Class file responsible for all failed logins.
* `Login` Class file responsible for the login process.
* `PinCode` Class file responsible for user Pin Code.
* `Session` Class file responsible for managing user session.
* `SuccessfulLogin` Class file responsible for all Successful logins.


#### categories directory breakdown.

* `Categories` Class file responsible managing user categories.

#### helpers directory breakdown.

* `Encryption` Class file responsible for encrypting/decrypting user passwords.
* `Generators` Class file responsible for generating keys (currently used to generated primary keys when inserting records into database).

#### passwords directory breakdown.

* `Passwords` Class file responsible for managing user passwords.

#### users directory breakdown.

* `Users` Class file responsible for managing users.


---

## Functions directory breakdown

The `functions` directory contains some functions that are used in server.

```
+---functions
|   +---requests
|   |       reject-request-in-lock-mode.php
|   |       
|   +---validators
|           validate-pin-code.php
|           validation-email.php
```

#### requests directory breakdown.

* `reject-request-in-lock-mode` responsible for blocking any request when user is in Lock Mode.

#### validators directory breakdown.

* `validate-pin-code` function responsible for blocking any request when user is in Lock Mode.
* `validation-email` function responsible for validating email address.


---


## Include directory breakdown

The `include` directory contains files that are included in page view such as page `<head>` and page `sidebar`.

```
+---include
|   |   page-footer.php
|   |   page-head.php
|   |   
|   +---components
|           header.php
|           sidebar.php
```

* `page-footer.php` contains the page view footer.
* `page-head.php` contains the page view head `<head>`.

#### components directory breakdown.

* `header.php` contains the header for the page view (theme icon, fullscreen icon, lock icon...).
* `sidebar.php` contains the page view sidebar.



---



## Javascript directory breakdown

The `javascript` directory contains javascript scripts that are used in whole project.

```
+---javascript
|   +---helpers
|   |       CopyToClipboard.js
|   |       PageLoader.js
|   |       
|   +---managers
|   |   +---alert-manager
|   |   |       AlertManager.js
|   |   |       
|   |   +---button-manager
|   |   |       ButtonManager.js
|   |   |       Document.md
|   |   |       
|   |   +---input-manager
|   |   |       InputManager.js
|   |   |       
|   |   +---select-manager
|   |           SelectManager.js
|   |           
|   +---requests
|   |       RequestGet.js
|   |       RequestPost.js
|   |       
|   +---security
|   |       EncryptionService.js
|   |       InactivityLock.js
|   |       
|   +---validators
|           EmailValidator.js
|           PinCodeValidator.js
```

#### helpers directory breakdown.

* `CopyToClipboard.js` Class file responsible for copying text to clipboard.
* `PageLoader.js` Class file responsible for the pre page loader.

#### alert-manager directory breakdown.

* `AlertManager.js` Class file responsible for showing alerts in page view.

#### button-manager directory breakdown.

* `button-manager.js` Class file responsible for managing buttons.

#### input-manager directory breakdown.

* `input-manager.js` Class file responsible for managing inputs.

#### select-manager directory breakdown.

* `select-manager.js` Class file responsible for managing selects.

#### requests directory breakdown.

* `RequestGet.js` Class file responsible for managing `GET` requests.
* `RequestPost.js` Class file responsible for managing `POST` requests.

#### security directory breakdown.

* `EncryptionService.js` Class file responsible for encrypting/decrypting text.
* `InactivityLock.js` Class file responsible for entering Lock Mode when user is inactive for a specific amount of time.

#### validators directory breakdown.

* `EmailValidator.js` Class file responsible for validating email address.
* `PinCodeValidator.js` Class file responsible for validating Pin Code.