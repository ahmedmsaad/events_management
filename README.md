# Events Management Custom Module

This objective is to build a custom module for managing events with CRUD operations and configuring this custom module.

## Requirements:

- XAMPP SERVER (PHP 9.x)
- Drupal 9
- Composr
- Docker

## Usage

- First you need to [XAMPP SERVER](https://pureinfotech.com/install-xampp-windows-10/).
- After that you can clone this repo locally

```bash
  git clone https://github.com/ahmedmsaad/events_management.git
```

- Now we have the drupal project with local dev environment

## How should we use the local environment with our project?

1. First, I would mention the project status untill now:
   1.1 Their is an issue with running the Drupal container, so I had to run the project locally and use the docker environment only with the Database and its admirer.
   1.2 The module install not working correctlly.

2. So you should run the dev environment:

```bash
  docker-compose up -d
```

3. navigate to [this link](http://localhost/events_management/web) so you can continue the project installation.

4. now, you should install the custom module.
   4.1 Go to admin -> Extend -> List
   4.2 Find the custom module, check it and click on the 'install' button
   4.3 Go to the home page and you will find the module item added to the main menu. click on the "Events" item in the main menu
   ![App screenshot](https://uc529b3d594b4b25b5917548e3c8.previews.dropboxusercontent.com/p/thumb/ABo5F0sMwYvxo6JPD2DCWjAYjV1PjPIdS9ZOkHCQC_hWkGXuuPKZlSBv7UP23WeDw9ryBNQeNx6hteH3EhCKuKHf2K3sNr7KXiUHqJh0O5c2Dqfb8ZDCoS7dZpQ9gwL8UYEgB37dSL4Ysbxj1zq0HBhenfWHtlcxQPFd_KrarMNQ4o1PvaclzIkxuAjkoiLj5qrUn-bTicbsRy7XYteZcSCAI-BoGyiLGQpAiPbJreMO8Pbt7OgldXpLFep8n95zdTYg2orKQUYySjrkg8umDSNb8DjKZHU3qDW-_GTziM8B3cokQwDSh071X042ly5aA5s7cEBBb2Zr6zHUOV0uLtHzrwkYQMHIeWGAOKe_z9SEAmOZEHDu17GrvWFkCwUZcardrsb6nElEc9h2M7O1R_bHaPoSMWSANc293LHQ1_xlZg/p.png)
   4.4 to changes the module configurations, visit the admin -> Configuration -> Development, click on the "Custom module settings".
   ![App screenshot](https://previews.dropbox.com/p/thumb/ABqodu8-HJBiUdFEXaExm-UepZuCxph9f9nlow8K2ulk1XqifNiVWW9aSzmWjZYjP-x7CTuyBNL_48bEYsGZ4oVkFTQqd3eysvaSB_z_xXK7TlxkFBZXGT5tT6VkKEpGkG6YdNWP_qRto3t3SUyvDxWFJSqgnPK2CR4EZXRJPKVvWfHgCCEPp9ESaTmA2T5gJx7WEVcV6wl7QBjJAmnJuHOBaRIAb1Zl43cSciBIJLwgHbFwe-gtuAIFrzMumcIcBtGdM944sS3ECNzy8EPe7AF1wjRqm5QExdxEr8Mi8MmGygPZ8nbivx2gcCrDuxGKsPQBPG1ATMkGpQ7v7qH94O4aKJOTNzItUQSbfsPoWOR-MkbeS5KahV4eNuFF0Np9ESMviD8nw6XKOYRz0EKcfJDI/p.png)
   4.5 For enabling the drupal block, visit /admin/structure/block and click on “place block” under one of the section(Ex: Sidebar ), search on the cutom block and then click on "place block"
   ![App screenshot](https://uc32766f4544ee576809543dcae0.previews.dropboxusercontent.com/p/thumb/ABrdSqY5N2wYiprOb2-Lh1vYLEKzbNifkuW7IZTvegKGpPBCGAj-XtA9re0H9mBRZlziExNEaMGBrbmJNNEIZp2Qj63X3JWSgh3T6OFuUfJNiGi7tf55yKKOJwFxfgG88UxYPw23k7ebrSI3Oa68QZmnZHz-Fzqb60bm9mxo-aZzqILiVivPh1Qeg9hYW1fB6ha9leGhUAkkx8HcaxqD_gFVq2toKSxWMNv1L-s8Ev2y_QMbFSnm-FIn9kVJM5TNueIwm6ZDDb4o7WfLFcjgCDgDdbIM7DxtKmRdEy68NmZbp0kSjeuqtognrawmqkr7xh5y2s2Tm3B5VovTLPweAqB6ZhKUvHziHLcQt4jVpsvje-y9EZihtGN5Ex16qEGp3BYAkYNolxRDtO3mTDKdwn-xkvOkzIGnMtnL6VhjQcA9tg/p.png)
