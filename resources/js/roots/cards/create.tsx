import ReactDOM from 'react-dom/client';
import CardGallery from '@/components/domains/cards/CardGallery/CardGallery';
import CreateFormModal from '@/components/domains/cards/CreateFormModal/CreateFormModal';

// Laravel から渡された画像データを取得
const cards = (window as any).cards || [];
const conditions = (window as any).conditions || [];

// Reactアプリケーションの描画
const root = ReactDOM.createRoot(document.getElementById('react-root') as HTMLElement);

root.render(
<CardGallery
  cards={cards}
  ModalComponent={CreateFormModal}
  {...(conditions && { modalConditions: conditions })}
/>);
