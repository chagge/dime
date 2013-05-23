# Routes

## Installer

install => install.intro
install/database => install.database
install/metadata => install.metadata
install/payment => install.payment
install/optional => install.extras

## Site

(:index) => products.latest
(:category) => products.category
(:category)/(:any) => products.single

search => search.advanced
search/(:any) => search.query
search/(:any)/(:num) => search.paged

download/(:any) => static.download
page/(:any) => static.page

(:any) => 404

## Admin (namespaced)

admin/login => user.login
admin/login/twitter => user.twitter
admin/forgot => user.forgot

admin/walkthrough => walkthrough.intro
admin/walkthrough/products => walkthrough.products
admin/walkthrough/new-product => walkthrough.newProduct
admin/walkthrough/stats => walkthrough.stats
admin/walkthrough/metadata => walkthrough.metadata
admin/walkthrough/oauth => walkthrough.oauth
admin/walkthrough/content => walkthrough.content

admin/products => products.all
admin/products/(:num) => products.edit
admin/products/(:num)/remove => products.remove
admin/products/new => products.create

admin/content => pages.all
admin/content/(:num) => pages.edit
admin/content/(:num)/remove => pages.remove
admin/content/new => pages.create

admin/stats => stats.overview
admin/stats/sales => stats.sales
admin/stats/customers => stats.customers
admin/stats/(:any) => stats.plugin

admin/design => theme.picker
admin/design/(:any) => theme.picker
admin/design/(:any)/edit => theme.modify
admin/design/(:any)/remove => theme.remove

admin/metadata => metadata.edit
admin/metadata/oauth => metadata.connect
admin/metadata/legal => metadata.legal
admin/metadata/shipping => metadata.shipping