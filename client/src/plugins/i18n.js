import { createI18n } from 'vue-i18n'
import en from '../locales/en.js'
import ckb from '../locales/ckb.js'

const messages = {
  en: { ...en },
  ckb: { ...ckb }
}

export default createI18n({
  locale: 'ckb',
  fallbackLocale: 'en',
  messages: messages,
  legacy: false
})