const { Builder, By, until, Key } = require('selenium-webdriver');

const fs = require('fs');

const chrome = require('selenium-webdriver/chrome')

;(async function () {

    let options = new chrome.Options()
    // options.addArguments(['start-maximized'])

    // options.addArguments("user-data-dir=C:/Users/rodno/AppData/Local/Google/Chrome/User Data");
    // options.addArguments("profile-directory=Default");



    let driver = await new Builder().forBrowser('chrome').setChromeOptions(options).build();

    await driver.get('https://www.vk.com/');

    const cookies = JSON.parse(fs.readFileSync('cookies.json'));
    for (let cookie of cookies) {
        await driver.manage().addCookie(cookie);
    }

    await driver.navigate().refresh();



    // let elem = await driver.wait(until.elementIsVisible(driver.findElement(By.css('.Umvnrc'))))
    //
    // await elem.click()
    //
    // let elem1 = await driver.wait(until.elementIsVisible(driver.findElement(By.css('#K54'))), 10000);
    //
    // await elem1.click();

    // let element = await driver.findElement(By.css('.header__link'))


    // await driver.quit();


    // let element = await driver.findElement(By.css('a.Link.WorkerControls-Control.WorkerControls-Control_chat'))
    // await element.click();
    //
    // let whatsappLink = await driver.findElement(By.css('a.SocialLinkList-whatsapp'));
    // contact.whatsapp = await whatsappLink.getAttribute('href');
    // console.log('WhatsApp номер найден:', contact.whatsapp);
    // let telegramLink = await driver.findElement(By.css('a.SocialLinkList-telegram'));
    // contact.telegram = await telegramLink.getAttribute('href');
    // console.log('Telegram номер найден:', contact.telegram);

})();