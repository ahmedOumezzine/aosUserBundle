# Getting started with AOS-UserBundle
Setting up the bundle



# Installation
<ol>

<h1><li>first step</li></h1>
Add the following line to your <code>composer.json</code> file.
<br>
<pre>
    // composer.json
    ...
    "require" : {
        [...]
        "aos/user-bundle" : "dev-master"
    },
    "repositories" : [{
        "type" : "vcs",
        "url" : "https://github.com/ahmedOumezzine/aosUserBundle.git"
    }],
    "require-dev": {
    ...
    </pre>
   
   
<h1><li>And now  Download the Bundle</li></h1>
Run the composer to download the bundle:
<pre>php composer.phar update  aos/user-bundle </pre>  


<h1><li>enable bundle</li></h1>
Then, enable the bundle by adding the following line in the <code>app/AppKernel.php</code> file of your project:
<pre>
    // app/AppKernel.php
    $bundles = array(
    ...
    new Symfony\Bundle\AsseticBundle\AsseticBundle(),
    new aos\UserBundle\aosUserBundle(),
    new FOS\UserBundle\FOSUserBundle(),
    new HWI\Bundle\OAuthBundle\HWIOAuthBundle(),
    );
</pre>    
   
<h1><li>Configuration</li></h1>
Add the following routes to your application <code>app/config.yml</code> and point them at actual controller actions
<pre>
    // app/config.yml
    imports:
       ..
       - { resource: config_aos.yml }
</pre>     

#create new file "config_aos.yml" at app/ and and this

<pre>
parameters:
      oauth.facebook.id: 153139431777462
      oauth.facebook.secret: d06f859366eff5f7f9503298e63d880d
      oauth.github.id: e8f4c8b3085715d55753
      oauth.github.secret: ec84c01d5a94c4cfda6dda7e384ad14bd340b8cf

framework:
    translator:      ~

fos_user:
    db_driver: orm
    firewall_name: main
    user_class: aos\UserBundle\Entity\User

hwi_oauth:
  firewall_name: main
  resource_owners:
    facebook:
      type: facebook
      client_id: %oauth.facebook.id%
      client_secret: %oauth.facebook.secret%
      infos_url: https://graph.facebook.com/me?fields=email
      scope: "email"
      paths:
         email: email
    github:
      type: github
      client_id: %oauth.github.id%
      client_secret: %oauth.github.secret%
      scope: email

aos_user:
      register:
          firstname: False # True or False
          lastname: False
          phonenumber: False
          birthday: False
          carte_Identite: False
          gender: False
          country: False
      network:
          visible: False
          facebook: True
          github: False

</pre>


<h1><li>change your security.yml</li></h1>

<pre>
security:
    encoders:
        FOS\UserBundle\Model\UserInterface: sha512

    role_hierarchy:
        ROLE_ADMIN:       ROLE_USER
        ROLE_SUPER_ADMIN: ROLE_ADMIN
 
    providers:
        fos_userbundle:
            id: fos_user.user_provider.username
 
    firewalls:
        main:
            context: user
            pattern: /.*
            oauth:
              resource_owners:
                facebook: "/login/check-facebook"
                github: "/login/check-github"
              login_path: /connect
              failure_path: /connect
              oauth_user_provider:
                service: my_user_provider
            form_login:
                provider: fos_userbundle
                csrf_provider: form.csrf_provider
            logout:       true
            anonymous:    true
 
    access_control:
        - { path: ^/login$, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/register, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/resetting, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/admin/, role: ROLE_ADMIN }   
</pre>
           
       
       <h1><li>routing</li></h1> 
add in routing file

<pre>   
aos_user:
    resource: "@aosUserBundle/Resources/config/routing.yml"
    prefix:   /

#FosUserBundle Routes
fos_user_security:
    resource: "@FOSUserBundle/Resources/config/routing/security.xml"

fos_user_profile:
    resource: "@FOSUserBundle/Resources/config/routing/profile.xml"
    prefix: /profile

fos_user_register:
    resource: "@FOSUserBundle/Resources/config/routing/registration.xml"
    prefix: /

fos_user_resetting:
    resource: "@FOSUserBundle/Resources/config/routing/resetting.xml"
    prefix: /resetting

fos_user_change_password:
    resource: "@FOSUserBundle/Resources/config/routing/change_password.xml"
    prefix: /profile

#HWIOAuthBundle routes
hwi_oauth_security:
    resource: "@HWIOAuthBundle/Resources/config/routing/login.xml"
    prefix: /login

hwi_oauth_connect:
    resource: "@HWIOAuthBundle/Resources/config/routing/connect.xml"
    prefix: /oauth

hwi_oauth_redirect:
    resource: "@HWIOAuthBundle/Resources/config/routing/redirect.xml"
    prefix:   /connect

facebook_login:
    pattern: /login/check-facebook

github_login:
    pattern: /login/check-github
      </pre>
 
</ol>
