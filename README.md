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
   ![App screenshot](https://previews.dropbox.com/p/thumb/ABq052XXATDGeLPHIZLvPEMHizXZkA31Ks4mQfezdV0t-s6pPvclID4mVRSIBYEXYT_R_E8c1KiWE81HwNIrgclAlJTiRErhfRoDU3miD5H7tSJJ2X1trJBMiuJWtKUYTl4YnG7W-poRtWHtuAIi-ACViTUWVhJbGtK7vb9Z0dilbSSaBsr7VKQRLPMd2uT69IuHxlikp-XW0jIOoOgZY0w_zpzUziBi8ZE5fVoZi_UxOYI0-EQBiADB1cn-Hs8SxTbmIGhycta32QoYaBaT52AJ4OSfzh474Me8TFCTDoaU3l0fRA3kRY0Gs5rsYNYIvgP4exCGQ3bVFIVkyW7Lw58_R5_FYAGEjXw519wUIhFRzVpw9pQRUwNFazmmK5lH9sQ/p.png)
   4.4 to changes the module configurations, visit the admin -> Configuration -> Development, click on the "Custom module settings".
   ![App screenshot](https://previews.dropbox.com/p/thumb/ABqkWqMBbDjR5i4ainVRzxzlvrWlx4YMNF_q9Wa6UMt_Bj-dQfAHKkE61EHqskZVF4W1xkZWKV9oHRHf5lhAxSrLSMJF2w3rQ4-ngOnIvq-BIFvfpiY7dGImQbKcOedpxmBiBiYqxjVEp4JWcQMAKjkgoYrZSEQDsRkdVKjR8IYC6pTiM-7ECAYIawdqaDey7nAiQt-sBftbFq2a904UjSlN59L15uKvmczoW09ulMMd5-VGKtFdZIgTX0eHoQxkUEzvYXRkB9gNAWeITj571ZKSEAGYheDzeZC-jzXKozYZtWCO1utk0UEnXSu_oX0xx199Z4JDIgZF6sA2uzlzgWqN3b9kKfJvJLYbEblCG0T1AtcFt1-2J9LV4XeLDabqc0U/p.png)
   4.5 For enabling the drupal block, visit /admin/structure/block and click on “place block” under one of the section(Ex: Sidebar ), search on the cutom block and then click on "place block"
   ![App screenshot](https://uc32766f4544ee576809543dcae0.previews.dropboxusercontent.com/p/thumb/ABrdSqY5N2wYiprOb2-Lh1vYLEKzbNifkuW7IZTvegKGpPBCGAj-XtA9re0H9mBRZlziExNEaMGBrbmJNNEIZp2Qj63X3JWSgh3T6OFuUfJNiGi7tf55yKKOJwFxfgG88UxYPw23k7ebrSI3Oa68QZmnZHz-Fzqb60bm9mxo-aZzqILiVivPh1Qeg9hYW1fB6ha9leGhUAkkx8HcaxqD_gFVq2toKSxWMNv1L-s8Ev2y_QMbFSnm-FIn9kVJM5TNueIwm6ZDDb4o7WfLFcjgCDgDdbIM7DxtKmRdEy68NmZbp0kSjeuqtognrawmqkr7xh5y2s2Tm3B5VovTLPweAqB6ZhKUvHziHLcQt4jVpsvje-y9EZihtGN5Ex16qEGp3BYAkYNolxRDtO3mTDKdwn-xkvOkzIGnMtnL6VhjQcA9tg/p.png)
