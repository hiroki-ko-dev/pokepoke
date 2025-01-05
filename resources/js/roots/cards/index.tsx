import ReactDOM from 'react-dom/client';
import CardGallery from '@/components/domains/cards/CardGallery/CardGallery';
import ViewModal from '@/components/domains/cards/ViewModal/ViewModal';

// Laravel から渡された画像データを取得
const cards = (window as any).cards || [];

// Reactアプリケーションの描画
const root = ReactDOM.createRoot(document.getElementById('react-root') as HTMLElement);
root.render(<CardGallery cards={cards} ModalComponent={ViewModal} />);
