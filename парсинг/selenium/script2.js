const { Builder, By, until } = require('selenium-webdriver');

// Функция для создания задержки
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

(async function () {
    let driver = await new Builder().forBrowser('chrome').build();
    try {
        // Переход на страницу
        await driver.get('https://uslugi.yandex.ru/2-saint-petersburg/category?text=%D0%B8%D0%B7%D0%B3%D0%BE%D1%82%D0%BE%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5+%D0%BF%D0%B5%D1%87%D0%B0%D1%82%D0%B8');
        await sleep(2000); // Задержка 2 секунды

        // Находим все элементы "Чат"
        let chatButtons = await driver.findElements(By.css('a.Link.WorkerControls-Control.WorkerControls-Control_chat'));

        // Массив для хранения номеров
        let contacts = [];

        for (let button of chatButtons) {
            // Прокручиваем к кнопке
            await driver.executeScript("arguments[0].scrollIntoView(true);", button);
            await sleep(1000); // Задержка 1 секунда перед кликом

            // Явное ожидание видимости элемента
            await driver.wait(until.elementIsVisible(button), 10000);

            // Попытка клика по элементу
            try {
                await button.click(); // Кликаем на кнопку "Чат"
                console.log('Кликнули на кнопку "Чат"');
            } catch (error) {
                console.log('Ошибка при клике, пробуем кликнуть через JavaScript');
                await driver.executeScript("arguments[0].click();", button); // Клик через JavaScript
            }

            await sleep(2000); // Задержка 2 секунды после клика

            // Ожидаем появления всплывающего окна
            let popup = await driver.wait(until.elementLocated(By.css('.Popup2')), 10000);
            await driver.wait(until.elementIsVisible(popup), 10000);
            console.log('Всплывающее окно появилось');

            // Объект для хранения контактов текущего элемента
            let contact = {};

            // Получаем номер WhatsApp
            try {
                let whatsappLink = await driver.findElement(By.css('a.SocialLinkList-whatsapp'));
                contact.whatsapp = await whatsappLink.getAttribute('href');
                console.log('WhatsApp номер найден:', contact.whatsapp);
            } catch (error) {
                console.log('WhatsApp номер не найден для этого элемента.');
                contact.whatsapp = null;
            }

            // Получаем номер Telegram
            try {
                let telegramLink = await driver.findElement(By.css('a.SocialLinkList-telegram'));
                contact.telegram = await telegramLink.getAttribute('href');
                console.log('Telegram номер найден:', contact.telegram);
            } catch (error) {
                console.log('Telegram номер не найден для этого элемента.');
                contact.telegram = null;
            }

            contacts.push(contact); // Сохраняем объект контакта в массив

            // Закрываем всплывающее окно
            await driver.executeScript("document.querySelector('.Popup2').style.display='none';");
            console.log('Закрыли всплывающее окно');
        }

        // Выводим все собранные контакты в консоль
        console.log('Собранные контакты:', contacts);

    } catch (error) {
        console.error('Ошибка:', error);
    } finally {

    }
})();
