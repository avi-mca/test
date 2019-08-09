# test
Install a new Magento CE 2.1
Then place this "Customerattributenew" filder inside app/code/
Then from CLI run setup:upgrade
Then Run setup:di:compile
Then Run setup:static-content:deploy
Then Run cache:flush
