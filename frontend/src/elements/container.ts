/**
 * Import LitElement base class, html helper function,
 * and TypeScript decorators
 **/
import {
  LitElement, html, css, customElement, property
} from 'lit-element';

/**
 * Use the customElement decorator to define your class as
 * a custom element. Registers <my-element> as an HTML tag.
 */
@customElement('wc-container')
export class Container extends LitElement {
  static get styles() {
    return css`
      
    `;
  }
  /**
   * Implement `render` to define a template for your element.
   */
  render() {
    return html`
      <slot></slot>
    `;
  }
}

