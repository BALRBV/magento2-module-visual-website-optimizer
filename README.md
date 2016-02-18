[![Build Status](https://scrutinizer-ci.com/g/BALRBV/magento2-module-visual-website-optimizer/badges/build.png?b=master)](https://scrutinizer-ci.com/g/BALRBV/magento2-module-visual-website-optimizer/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/BALRBV/magento2-module-visual-website-optimizer/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/BALRBV/magento2-module-visual-website-optimizer/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/BALRBV/magento2-module-visual-website-optimizer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/BALRBV/magento2-module-visual-website-optimizer/?branch=master)

# Magento 2 Module: Visual Website Optimizer

Make it easy to add the vwo.com JS code before the </head>. 

## Settings

Allows you to enable/disable the module from the backend including setting your Account ID. Besides that, it allows you to choose two different output types.

## Types

* Simple: just inserts the VWO.com code including your Account ID. VWO.com will use the URL as shown in your browser.
* Complex: inserts the VWO.com code including your Account ID. VWO.com will get the path after internal rewriting supplied. This allows you e.g. to target all product pages at once with a test, while not having /product/ in your URL's. Supplied URL's look like {baseUrl}/catalog/product/view/id/1.